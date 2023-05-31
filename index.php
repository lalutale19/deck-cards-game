<?php

class Deck
{
    /**
	 * Builds a deck of cards.
	 *
	 * @return array
	 */
	public static function cards($StraightType)
	{
		$values = array('A','2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');
		$suits  = array('S', 'H', 'D', 'C');

		if($StraightType === "sflush"){
		     $random_keys=array_rand($suits,1);
		     $suits=[$suits[$random_keys]];
		}
		
		if($StraightType === "sflushOrder10"){
    		$values = array('10', 'J', 'Q', 'K','A');
		}
		
		$cards = array();
	
		foreach ($suits as $suit) {
			foreach ($values as $value) {
				$cards[] = $value . $suit;
			}
		}
			//	return $cards;
	    $numbers=$cards;
		
		sort($numbers);
        $cardNew=array();
        $arrlength = count($numbers);
        for($x = 0; $x < $arrlength; $x++) {
        	$cardNew[] =$numbers[$x];
        }
       return  $cardNew;
	}
	
	/**
	 * Shuffles an array of cards.
	 *
	 * @param array $cards The array of cards to shuffle.
	 *
	 * @return array
	 */
	public static function shuffle(array $cards)
	{
		$total_cards = count($cards);
		foreach ($cards as $index => $card) {
			// Pick a random second card.
			$card2_index = mt_rand(1, $total_cards) - 1;
			$card2 = $cards[$card2_index];
			
			// Swap the positions of the two cards.
			$cards[$index] = $card2;
			$cards[$card2_index] = $card;
		}
		
		return $cards;
	}
}

$cards = array_unique(Deck::cards(0));
// Random cards
$cardShuffle=Deck::shuffle($cards);
$cardStraightFlush=Deck::cards("sflush");
// Straight flush order
$cardStraightFlush10=Deck::cards("sflushOrder10");
//Random list show
$deckList=array("cardShuffle","cardStraightFlush","cardStraightFlush10");
$random_keys=array_rand($deckList,1);
 $cardPrint=$deckList[$random_keys];
 $cardResp=@array_splice(array_unique(Deck::shuffle($$cardPrint)), 0, 5);
 /// Output in array with 5 values
print_r($cardResp);


