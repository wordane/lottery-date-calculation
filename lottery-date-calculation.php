<?php
/*
 * The Irish National Lottery draw takes place twice weekly on a Wednesday and a Saturday at 8pm.
 * Write a function or class that calculates and returns the next valid draw date based on the current
 * date and time AND also on an optionally supplied date and time.
 * 
*/

class Lottery {
    //private $currentDate;
    private $lotteryDate;
    private $currentDate;
    private $wednesdayLottery;
    private $saturdayLottery;
    /* Private constructor
     * If the lottery is to be drawn today, then lotteryDate = today
     * Else the lotteryDate = FALSE
     */
    public function __construct(){
        $this->currentDate      =   new Datetime();
        $this->wednesdayLottery =   new DateTime('next wednesday 20:00:00');
        $this->saturdayLottery  =   new DateTime('next saturday 20:00:00'); 
    }
    
    public function getLotteryDate($date = false){
        /* Comparing differences in date
         * If Wednesday is closer, then wednesdayLottery date
         * Else saturdaylottery date
         */
        if(!$date){
            $this->lotteryDate  =   ($this->currentDate->diff($this->wednesdayLottery) < $this->currentDate->diff($this->saturdayLottery) ) ? $this->saturdayLottery : $this->wednesdayLottery;
        } else {
            $this->lotteryDate  =   new DateTime($date);
        }
        return $this->lotteryDate->format('Y-m-d H:i:s');
    }
    
    // Function to calculate lottery on a given date
    private function calculateLottery() {
        // do something
    }
        
}

// Instantiating a class
$lottery = new Lottery();

/*
 * Supply the date to calculate the lottery 
 * OR
 * Leave the function empty to calculate based on business logic
*/
print $lottery->getLotteryDate('today 18:00:00');

print ($lottery->getLotteryDate());

?>