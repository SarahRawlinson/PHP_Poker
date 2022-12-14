<?php namespace App\Classes\Cards\Dealer;

use App\Classes\Cards\Card\RankEnum;
use App\Classes\Cards\Card\StandardPlayingCard;
use App\Classes\Cards\Card\SuitEnum;
use App\Classes\Cards\Deck;
use App\Classes\Player\PlayerGroup;

class StandardPlayingCardDealer implements IDealer
{
    private Deck $deck;

    /**
     *
     */
    public function __construct()
    {
        $this->deck = $this->createDeck();
    }

    /**
     * @return void
     */
    public function shuffleCards(): void
    {
        //echo $this->deck;
        //$array = $this->deck->getArrayCopy();
        $this->deck = $this->deck->randomize();
        //echo $this->deck;
    }

    /**
     * @param int $qty
     * @return Deck
     */
    public function popCards(int $qty): Deck
    {
        $deck = new Deck();
        for ($i = 0; $i < $qty; $i++) {
            $deck->append($this->deck->pop());
        }
        return $deck;
    }

    /**
     * @param PlayerGroup $playerGroup
     * @param int $qty
     * @return void
     */
    public function deal(PlayerGroup $playerGroup, int $qty): void
    {
        foreach ($playerGroup as $player) {
            $player->giveCards($this->popCards($qty));
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

    /**
     * @return Deck
     */
    public static function createDeck(): Deck
    {
        $deck = new Deck();
        foreach (SuitEnum::cases() as $suit) {
            foreach (RankEnum::cases() as $rank) {
                $deck[] = new StandardPlayingCard($rank, $suit);
            }
        }
        return $deck;
    }

    /**
     * @return Deck
     */
    public function getDeck(): Deck
    {
        return $this->deck;
    }

}
