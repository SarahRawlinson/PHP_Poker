<?php

class StandardPlayerCardDealer implements IDealer
{
    private Deck $deck;
    
    public function __construct()
    {
        $this->deck = new Deck();
        foreach (Suit::cases() as $suit)
        {
            foreach (Rank::cases() as $rank)
            {
                $this->deck[] = new StandardPlayingCard($rank, $suit);
            }
        }
    }

    /**
     * @return void
     */
    public function shuffleCards(): void
    {
        shuffle($this->deck);
    }

    /**
     * @param int $qty
     * @return Deck
     */
    private function popCards(int $qty): Deck
    {
        $deck = new Deck();
        for($i=0;$i<$qty;$i++)
        {
            $deck->append(array_pop($this->deck));
        }
        return $deck;
    }

    /**
     * @param PlayerGroup $playerGroup
     * @return void
     */
    public function deal(PlayerGroup $playerGroup): void
    {
        $v = 1;
        foreach ($playerGroup as $player)
        {
            $player->giveCards($this->popCards($v));
        }
    }

    /**
     * @param Deck $deck
     * @return void
     */
    public function collectCards(Deck $deck): void
    {
        $this->deck->array_merge($deck);
        $this->shuffleCards();
    }
    
    
}