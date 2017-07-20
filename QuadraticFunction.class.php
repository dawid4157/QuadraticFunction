<?php
   class QuadraticFunction {
      protected $coefficientA, $coefficientB, $coefficientC;
      private $message;

     /**
       * @param int $coefficientA
       * @param int $coefficientB
       * @param int $coefficientC
       * @return $this
       */

       public function __construct($coefficientA, $coefficientB, $coefficientC) {
          $delta = $coefficientB * $coefficientB - 4 * $coefficientA * $coefficientC;
	  $this->a = $coefficientA;
	  $this->b = $coefficientB;
	  $this->c = $coefficientC;
	  $this->delta = $delta;
	  return $this;
	}

	/**
	  * @return float
	  */
	public function getDiscriminant() {
	   return $this->delta;
	}
	   
	/**
	  * @return float
	  */
	public function getRootDelta() {
	   $root = round(sqrt($this->delta), 2);
	   return $root;
	}

	/**
	  * @return $this->message;
	  */
	public function getMessage() {
	   return $this->message;
	}

	/**
	  * @return float
	  */
	public function x0() {
	   $x1 = - $this->b / 2 * $this->b;
	   return $x1;
	}

	/**
	  * @return float
	  */
	public function x1() {
	   $x1 = - $this->b - $this->getRootDelta() / 2 * $this->b;
	   return $x1;
	}

	/**
	  * @return float
	  */
	public function x2() {
	   $x1 = - $this->b + $this->getRootDelta() / 2 * $this->b;
	   return $x1;
	}

	/**
	  * @return float
	  */
	public function top1() {
	   $top1 = -$this->b / 2 * $this->a;
	   return $top1;
	}

	/**
	  * @return float
	  */
	public function top2() {
	   $top2 = -pow($this->b, 2) - 4 * $this->a * $this->c / 4 * $this->a;
	   return $top2;
	}

	/**
	  * @return $this->delta
	  * @return $this->message
	  */
	public function deltaConditions() {
	   if ($this->delta < 0) {
	      $this->message = '&Delta; < 0';
	   }
	   if ($this->delta == 0) {
	      $this->message = '&Delta; = 0.';
	      $this->message .= 'x0: '.$this->x0().'';
	      $this->message .= 'W('.$this->top1().', '.$this->top2().')';
	   }
	   if ($this->delta > 0) {
	      $this->message = '&Delta; > 0';
	      $this->message .= 'x1: '.$this->x1().', x2: '.$this->x2().'';
	      $this->message .= 'W('.$this->top1().', '.$this->top2().')';
	   }
	   return $this->message;
	}
   }
   $square = new QuadraticFunction(2, -6, 0);
?>

<?= $square->deltaConditions(); ?>
<?= $square->getDiscriminant(); ?>
<?= $square->getRootDelta(); ?>
