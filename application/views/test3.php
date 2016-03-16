<?
	$q = new SplQueue();
  $q->enqueue(1);
  $q->enqueue(2);
  $q->enqueue(3);

  echo $q->dequeue();
  echo $q->dequeue();
  echo $q->dequeue();
