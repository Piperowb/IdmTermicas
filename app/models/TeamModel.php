<?php
/**
 * IDM TÉRMICAS - TeamModel
 */

class TeamModel
{
    public static function getValues(): array
    {
        return [
            [
                'icon'  => 'bi-patch-check-fill',
                'title' => 'Calidad Certificada',
                'desc'  => 'Cumplimos con códigos internacionales ASME, API y TEMA en todos nuestros procesos.',
            ],
            [
                'icon'  => 'bi-shield-fill-check',
                'title' => 'Seguridad Industrial',
                'desc'  => 'Equipos seguros y eficientes, con bajos consumos de combustible y ajustados a la norma ambiental.',
            ],
            [
                'icon'  => 'bi-lightning-charge-fill',
                'title' => 'Eficiencia Energética',
                'desc'  => 'Maximizamos el rendimiento de tus sistemas térmicos para reducir costos operativos.',
            ],
            [
                'icon'  => 'bi-people-fill',
                'title' => 'Equipo Calificado',
                'desc'  => 'Ingenieros y técnicos especializados en instrumentación, electricidad y soldadura.',
            ],
            [
                'icon'  => 'bi-gear-wide-connected',
                'title' => 'Tecnología Avanzada',
                'desc'  => 'Aplicamos métodos como elementos finitos para diseños precisos y confiables.',
            ],
            [
                'icon'  => 'bi-arrow-repeat',
                'title' => 'Compromiso Total',
                'desc'  => 'Acompañamos a nuestros clientes desde el diseño hasta la puesta en marcha.',
            ],
        ];
    }

    public static function getTimeline(): array
    {
        return [
            [
                'year'  => '2009',
                'icon'  => 'bi-rocket-takeoff-fill',
                'title' => 'Fundación',
                'desc'  => 'Nace IDM TÉRMICAS S.A.S. en Cali, Colombia, con el propósito de ofrecer soluciones integrales en ingeniería térmica.',
            ],
            [
                'year'  => '2014',
                'icon'  => 'bi-graph-up-arrow',
                'title' => 'Expansión de Servicios',
                'desc'  => 'Ampliamos nuestro portafolio a diseño, fabricación y mantenimiento de calderas e intercambiadores.',
            ],
            [
                'year'  => '2019',
                'icon'  => 'bi-award-fill',
                'title' => 'Certificaciones Internacionales',
                'desc'  => 'Obtenemos certificaciones ASME, API y TEMA que respaldan la calidad de nuestros procesos.',
            ],
            [
                'year'  => '2024',
                'icon'  => 'bi-trophy-fill',
                'title' => 'Líderes del Sector',
                'desc'  => 'Nos consolidamos como referente en soluciones térmicas para la industria colombiana.',
            ],
        ];
    }
}