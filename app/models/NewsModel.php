<?php
class NewsModel
{
    public static function getDestacada(): array {
        return [
            'titulo' => '🔍 ¿Estás al día con las normativas?',
            'cuerpo' => 'Según la Resolución 1857 de 2024, los empleadores están obligados a garantizar la inspección y el mantenimiento de calderas por empresas autorizadas.',
            'beneficios' => [
                'Experiencia certificada en inspección y mantenimiento.',
                'Cumplimiento de normativas para garantizar seguridad y eficiencia.',
            ],
            'equipo' => [
                'nombre' => 'CALDERA 100 BHP-150 PSIG',
                'marca' => 'Continental',
                'capacidad' => '100 BHP',
                'pasos' => '2',
                'presion' => '150 PSIG',
                'combustible' => 'Gas – ACPM',
                'quemador' => 'Integrado Continental',
                'auxiliares' => 'Tanque de condensados, bomba para agua de alimentación, chimenea.',
                'aislamiento' => 'Lana mineral 2” Esp.',
                'forro' => 'Lámina inox 430 Cal 24.',
            ],
        ];
    }
}