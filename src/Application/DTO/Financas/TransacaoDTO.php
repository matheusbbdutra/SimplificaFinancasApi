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
}
