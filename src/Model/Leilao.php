<?php

namespace Leilao\Model;

class Leilao
{
    /** @var Lance[] */
    private $lances;
    /** @var string */
    private $descricao;
    /** @var bool */
    private $finalizado;
<<<<<<< HEAD
    /** @var \DateTimeInterface  */
    private $dataInicio;
    /** @var int */
    private $id;

    public function __construct(string $descricao, \DateTimeImmutable $dataInicio = null, int $id = null)
    {
        $this->descricao = $descricao;
        $this->finalizado = false;
        $this->lances = [];
        $this->dataInicio = $dataInicio ?? new \DateTimeImmutable();
        $this->id = $id;
=======

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
        $this->lances = [];
        $this->finalizado = false;
>>>>>>> e9397e96b2d5144cb044ed45cad9602631e49ee0
    }

    public function recebeLance(Lance $lance)
    {
<<<<<<< HEAD
        if ($this->finalizado) {
            throw new \DomainException('Este leilão já está finalizado');
        }

        $ultimoLance = empty($this->lances)
            ? null
            : $this->lances[count($this->lances) - 1];
        if (!empty($this->lances) && $ultimoLance->getUsuario() == $lance->getUsuario()) {
            throw new \DomainException('Usuário já deu o último lance');
=======
        if (!empty($this->lances) && $this->ehDoUltimoUsuario($lance)) {
            throw new \DomainException('Usuário não pode propor 2 lances consecutivos');
        }

        $totalLancesUsuario = $this
            ->quantidadeLancesPorUsuario($lance->getUsuario());
        if ($totalLancesUsuario >= 5) {
            throw new \DomainException('Usuário não pode propor mais de 5 lances por leilão');
>>>>>>> e9397e96b2d5144cb044ed45cad9602631e49ee0
        }

        $this->lances[] = $lance;
    }

<<<<<<< HEAD
    public function finaliza()
    {
        $this->finalizado = true;
    }

=======
>>>>>>> e9397e96b2d5144cb044ed45cad9602631e49ee0
    /**
     * @return Lance[]
     */
    public function getLances(): array
    {
        return $this->lances;
    }

<<<<<<< HEAD
    public function recuperarDescricao(): string
    {
        return $this->descricao;
=======
    public function finaliza()
    {
        $this->finalizado = true;
>>>>>>> e9397e96b2d5144cb044ed45cad9602631e49ee0
    }

    public function estaFinalizado(): bool
    {
        return $this->finalizado;
    }

<<<<<<< HEAD
    public function recuperarDataInicio(): \DateTimeInterface
    {
        return $this->dataInicio;
    }

    public function temMaisDeUmaSemana(): bool
    {
        $hoje = new \DateTime();
        $intervalo = $this->dataInicio->diff($hoje);

        return $intervalo->days > 7;
    }

    public function recuperarId(): int
    {
        return $this->id;
=======
    /**
     * @param Lance $lance
     * @return bool
     */
    private function ehDoUltimoUsuario(Lance $lance): bool
    {
        $ultimoLance = $this->lances[array_key_last($this->lances)];
        return $lance->getUsuario() == $ultimoLance->getUsuario();
    }

    private function quantidadeLancesPorUsuario(Usuario $usuario): int
    {
        $totalLancesUsuario = array_reduce(
            $this->lances,
            function (int $totalAcumulado, Lance $lanceAtual) use ($usuario) {
                if ($lanceAtual->getUsuario() == $usuario) {
                    return $totalAcumulado + 1;
                }

                return $totalAcumulado;
            },
            0
        );

        return $totalLancesUsuario;
>>>>>>> e9397e96b2d5144cb044ed45cad9602631e49ee0
    }
}
