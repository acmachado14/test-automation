<?php

namespace Leilao\Service;

<<<<<<< HEAD
use Leilao\Model\Lance;
use Leilao\Model\Leilao;

class Avaliador
{
    /** @var float */
    private $menorValor = INF;
    /** @var float */
    private $maiorValor = 0;
    /** @var Lance[]|array */
    private $maiores;

    public function avalia(Leilao $leilao)
    {
        $leilao->finaliza();
=======
use Leilao\Model\Leilao;
use Leilao\Model\Lance;

class Avaliador
{
    private $maiorValor = -INF;
    private $menorValor = INF;
    private $maioresLances;

    public function avalia(Leilao $leilao): void
    {
        if ($leilao->estaFinalizado()) {
            throw new \DomainException('Leilão já finalizado');
        }

        if (empty($leilao->getLances())) {
            throw new \DomainException('Não é possível avaliar leilão vazio');
        }
>>>>>>> e9397e96b2d5144cb044ed45cad9602631e49ee0

        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }

            if ($lance->getValor() < $this->menorValor) {
                $this->menorValor = $lance->getValor();
            }
<<<<<<< HEAD

            $this->maiores = $this->avaliaTresMaioresLances($leilao);
        }
    }

    public function getMenorValor(): float
    {
        return $this->menorValor;
=======
        }

        $lances = $leilao->getLances();
        usort($lances, function (Lance $lance1, Lance $lance2) {
            return $lance2->getValor() - $lance1->getValor();
        });
        $this->maioresLances = array_slice($lances, 0, 3);
>>>>>>> e9397e96b2d5144cb044ed45cad9602631e49ee0
    }

    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }

<<<<<<< HEAD
    /**
     * @return Lance[]
     */
    public function getTresMaioresLances(): array
    {
        return $this->maiores;
    }

    /**
     * @param Leilao $leilao
     * @return Lance[]|array
     */
    private function avaliaTresMaioresLances(Leilao $leilao)
    {
        $lances = $leilao->getLances();
        usort($lances, function (Lance $lance1, Lance $lance2) {
            return $lance2->getValor() - $lance1->getValor();
        });

        return array_slice($lances, 0, 3);
=======
    public function getMenorValor(): float
    {
        return $this->menorValor;
    }

    /**
     * @return Lance[]
     */
    public function getMaioresLances(): array
    {
        return $this->maioresLances;
>>>>>>> e9397e96b2d5144cb044ed45cad9602631e49ee0
    }
}
