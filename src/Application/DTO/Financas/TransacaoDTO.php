<?php

namespace App\Application\DTO\Financas;

use App\Domain\Financas\Enums\TipoTranscaoEnum;
use Symfony\Component\Serializer\Annotation\SerializedName;

class TransacaoDTO
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('conta_id')]
    private int $contaId;

    #[SerializedName('valor')]
    private float $valor;

    #[SerializedName('tipo_transacao')]
    private int $tipoTransacao;

    #[SerializedName('dt_lancamento')]
    private \DateTime $dtLancamento;

    #[SerializedName('dt_vencimento')]
    private \DateTime $dtVencimento;

    #[SerializedName('conta_destino_id')]
    private ?int $contaDestinoId;

    #[SerializedName('recorrencia')]
    private ?string $recorrencia;

    #[SerializedName('parcela')]
    private ?int $parcela;

    #[SerializedName('parcelas')]
    private ?int $parcelas;

    #[SerializedName('cartao_id')]
    private ?int $cartaoId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getContaId(): int
    {
        return $this->contaId;
    }

    public function setContaId(int $contaId): void
    {
        $this->contaId = $contaId;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getTipoTransacao(): int
    {
        return $this->tipoTransacao;
    }

    public function setTipoTransacao(int $tipoTransacao): void
    {
        $this->tipoTransacao = $tipoTransacao;
    }

    public function getDtLancamento(): \DateTime
    {
        return $this->dtLancamento;
    }

    public function setDtLancamento(\DateTime $dtLancamento): void
    {
        $this->dtLancamento = $dtLancamento;
    }

    public function getDtVencimento(): \DateTime
    {
        return $this->dtVencimento;
    }

    public function setDtVencimento(\DateTime $dtVencimento): void
    {
        $this->dtVencimento = $dtVencimento;
    }

    public function getContaDestinoId(): ?int
    {
        return $this->contaDestinoId;
    }

    public function setContaDestinoId(?int $contaDestinoId): void
    {
        $this->contaDestinoId = $contaDestinoId;
    }

    public function getRecorrencia(): ?string
    {
        return $this->recorrencia;
    }

    public function setRecorrencia(?string $recorrencia): void
    {
        $this->recorrencia = $recorrencia;
    }

    public function getParcela(): ?int
    {
        return $this->parcela;
    }

    public function setParcela(?int $parcela): void
    {
        $this->parcela = $parcela;
    }

    public function getParcelas(): ?int
    {
        return $this->parcelas;
    }

    public function setParcelas(?int $parcelas): void
    {
        $this->parcelas = $parcelas;
    }

    public function getCartaoId(): ?int
    {
        return $this->cartaoId;
    }

    public function setCartaoId(?int $cartaoId): void
    {
        $this->cartaoId = $cartaoId;
    }

    public function isReceita(): bool
    {
        return $this->tipoTransacao === TipoTranscaoEnum::RECEITA->value;
    }

    public function isDespesa(): bool
    {
        return $this->tipoTransacao === TipoTranscaoEnum::DESPESA->value;
    }

    public function isTransferencia(): bool
    {
        return $this->tipoTransacao === TipoTranscaoEnum::TRANSFERENCIA->value;
    }

    public function isDespesaCartao(): bool
    {
        return $this->tipoTransacao === TipoTranscaoEnum::DESPESA_CARTAO->value;
    }
}
