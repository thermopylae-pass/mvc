<h1><?php echo $welcome; ?></h1>
<!--<div>
	<span>First Name: <?php echo $user['first_name']; ?></span><br />
	<span>MI: <?php echo $user['mid_init']; ?></span><br />
	<span>Last Name: <?php echo $user['last_name']; ?> </span>
</div> -->
<?php

 $list = array();
 $host1 = '10.0.6.29';
 $host2 = '10.0.6.28';
 $host3 = '10.0.6.27';
 $host4 = '10.0.6.29';
 
 $schema1 = 'outcalls';
 $schema2 = 'some_other_schema';
 $schema3 = 'master';
 
 addLinks($host1, $schema1, $list);
 addLinks($host1, $schema2, $list);
 
 addLinks($host2, $schema1, $list);
 addLinks($host2, $schema2, $list);

 addLinks($host3, $schema1, $list);
 addLinks($host3, $schema2, $list);
 
 addLinks($host4, $schema1, $list);
 addLinks($host4, $schema2, $list);
 addLinks($host4, $schema3, $list);

 
 echo '<pre>';
 print_r($list);
 echo '</pre>';
 
 getdbLink($host3, $schema2, $list);
 
 $_dbLink = ( isRemoteConnection() ) 
			? 'isRemoteConnection' 
			: 'NOT isRemoteConnection';
 
 echo ('_dbLink: '. $_dbLink. '<br />');

 
 /**
  * 
  * @param type $host
  * @param type $schema
  * @param array $list
  */
function addLinks($host, $schema, &$list){
	$list[$host][$schema] = 'dblink_for_'.$schema;
}

/**
 * 
 * @param type $host
 * @param type $schema
 * @param type $list
 */
function getdbLink($host, $schema, $list){

//	print_r($list);
	if (array_key_exists($host, $list) ){
		if ( array_key_exists($schema, $list[$host]))
			echo 'host: '. $host. '<br />dblink: '. $list[$host][$schema].'<br />';
		else
			echo 'SCHEMA NOT FOUND....<br />';
		//print_r($list[$host]);
	}else{
		echo "schema: ". $schema. ' NOT FOUND <br />';
	}
}

/**
 * 
 * @return type
 */
function isRemoteConnection()

{
	$remotedb = true;
	$remotedbIP ='10.0.6.29';
	if ( ($remotedb != FALSE) && (!is_null($remotedbIP)) )
	{
		return ( true );
	}

	return ( false );
}

/**
 * the below example highlights the Observer Pattern
 */
abstract class AbstractObserver {
    abstract function update(AbstractSubject $subject_in);
}

abstract class AbstractSubject {
    abstract function attach(AbstractObserver $observer_in);
    abstract function detach(AbstractObserver $observer_in);
    abstract function notify();
}

function writeln($line_in) {
    echo $line_in."<br/>";
}

/**
 * PatternObserver
 */
class PatternObserver implements splObserver /*AbstractObserver*/ {
	public function __construct() {
	}
	
	public function update(splSubject /*AbstractSubject*/ $subject) {
		writeln('*IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*');
		writeln(' new favorite patterns: '.$subject->getFavorites());
		writeln('*IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*');      
	}
}
/**
 * PatternSubject
 */
class PatternSubject implements splSubject /*AbstractSubject*/ {
    private $favoritePatterns	= NULL;
    private $observers			= array();
	
    function __construct() {
    }
    function attach(splObserver /*AbstractObserver*/ $observer_in) {
      //could also use 
	  array_push($this->observers, $observer_in);
      //$this->observers[] = $observer_in;
    }
    function detach( splObserver /*AbstractObserver*/ $observer_in) {
      //$key = array_search($observer_in, $this->observers);
      foreach($this->observers as $okey => $oval) {
        if ($oval == $observer_in) { 
          unset($this->observers[$okey]);
        }
      }
    }
    function notify() {
      foreach($this->observers as $obs) {
        $obs->update($this);
      }
    }
    function updateFavorites($newFavorites) {
      $this->favorites = $newFavorites;
      $this->notify();
    }
    function getFavorites() {
      return $this->favorites;
    }
}
/*
  writeln('BEGIN TESTING OBSERVER PATTERN');
  writeln('');

  $patternGossiper = new PatternSubject();
  $patternGossipFan = new PatternObserver();
  
  $patternGossiper->attach($patternGossipFan);
  $patternGossiper->updateFavorites('abstract factory, decorator, visitor');
  $patternGossiper->updateFavorites('abstract factory, observer, decorator');
  $patternGossiper->detach($patternGossipFan);
  $patternGossiper->updateFavorites('abstract factory, observer, paisley');

  writeln('END TESTING OBSERVER PATTERN');
*/
?>
