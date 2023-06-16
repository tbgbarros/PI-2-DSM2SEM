<?php
session_start();
require_once 'class/func.php';
require_once 'class/log_consult.php';
// Verifica se existem registros retornados
if (!empty($consultaConsultas)) {
    // Exibe os registros do paciente encontrado
    echo "<h2>Dados do Paciente:</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>CPF</th>";
    echo "<th>Observações</th>";
    echo "</tr>";

    while ($row = $consultaConsultas->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='width:30%'>
        <div class='d-flex align-items-center gap-2'>
        <span class='badge bg-primary rounded-3 fw-semibold'>"
            . $row["nome"] .
            "</span>
        </div>
    </td>";
        echo "<td>
    <div class='d-flex align-items-center gap-2'>
        <span class='badge bg-warning rounded-3 fw-semibold'>"
            . $row["cpf"] .
            "</span>
    </div>
    </td>";
        echo "<td width='40%'>
        <div class='d-flex align-items-center gap-3'>
        <span class='badge bg-danger rounded-2 fw-semibold'>"
            . $row["observacoes"] .
            "</span>
        </div>
    </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}
