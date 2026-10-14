<?php
class ServiceModel
{
    public static function getHeroServices(): array {
        return [
            [
                'badge' => 'Consultoría e Interventoría Especializada',
                'title_line1' => 'Asesorías y',
                'title_line2' => 'Diagnósticos Precisos',
                'description' => 'Ofrecemos inspección detallada y asesorías en combustión, normas ambientales y calificación de procedimientos de soldadura, asegurando que tus equipos cumplan con los más altos estándares.',
                'bg' => 'FONDO3.jpg',
                'link' => '/consultoria-e-interventoria',
            ],
            [
                'badge' => 'Diseño y Fabricación a la Medida',
                'title_line1' => 'Diseño y Fabricación',
                'title_line2' => 'de Equipos Industriales',
                'description' => 'Especializados en el diseño y fabricación de calderas, intercambiadores de calor, tanques, y sistemas de captación de particulado, garantizando eficiencia y cumplimiento de normas internacionales.',
                'bg' => 'FONDO4.jpg',
                'link' => '/diseno-y-fabricacion',
            ],
            [
                'badge' => 'Mantén tus Sistemas en Óptimas Condiciones',
                'title_line1' => 'Mantenimiento y',
                'title_line2' => 'Calibración Profesional',
                'description' => 'Nuestro equipo de ingenieros y técnicos ofrece mantenimiento y calibración de equipos, asegurando su operación eficiente y prolongando su vida útil.',
                'bg' => 'FONDO5.jpg',
                'link' => '/mantenimiento-y-calibracion',
            ],
        ];
    }

    public static function getAll(): array {
        return [
            [
                'id' => 1, 'slug' => 'consultoria',
                'badge' => 'Planificación Estratégica',
                'title' => 'Consultoría y Diagnóstico',
                'description' => 'Brindamos asesoría experta en combustión y cumplimiento de normas ambientales, así como inspección y diagnóstico de equipos, asegurando el máximo rendimiento de tus sistemas industriales.',
                'bg' => 's2.jpg',
                'hero' => 'ss9.jpg',
                'items' => [
                    'Asesorías en combustión y norma ambiental vigente.',
                    'Inspección y diagnóstico de equipos generadores de vapor en sus partes de presión y partes lado gases, tuberías de gases, inspección de refractarios.',
                    'Medición de espesores y asesoría en calificación de procedimientos de soldadura bajo código ASME.',
                    'Pruebas para arranque de calderas.',
                    'Cálculos para partes de presión bajo código ASME y API',
                    'Ofrecemos el servicio de acompañamiento para los estudios Isocineticos con el fin de llevar la caldera a sus mejores condiciones para el cumplimiento de la normatividad ambiental vigente.',
                    'Ofrecemos servicio de diagnóstico y recomendaciones para la selección de equipos de control ambiental según las exigencias de la legislación colombiana.',
                    'Asesorías en código ASME y API',
                ],
            ],
            [
                'id' => 2, 'slug' => 'mantenimiento',
                'badge' => 'Resultados Comprobados',
                'title' => 'Mantenimiento y Calibración',
                'description' => 'Asegura la operatividad de tus equipos con nuestros servicios de mantenimiento y calibración, realizados por un equipo técnico altamente calificado.',
                'bg' => 'FONDO8.jpg',
                'hero' => 's2.2.jpg',
                'items' => [
                    'I.D.M. TERMICAS S.A.S, es una empresa proveedora de soluciones que cuenta con un equipo de ingenieros y técnicos altamente calificados en el área de instrumentación, electricidad, aislamiento y soldadura especializada entre otros; cuyo propósito es dar solución a nuestros clientes de acuerdo a sus requerimientos.',
                ],
            ],
            [
                'id' => 3, 'slug' => 'diseno',
                'badge' => 'Técnicas de Vanguardia',
                'title' => 'Soluciones de Diseño',
                'description' => 'Nuestros diseños de calderas, intercambiadores de calor y sistemas de captación de particulado se basan en métodos avanzados de cálculo para ofrecerte eficiencia y cumplimiento normativo.',
                'bg' => 'FONDO9.jpg',
                'hero' => 'ss2.jpg',
                'items' => [
                    'Con el propósito de garantizar nuestros diseños, empleamos el método de elementos finitos como técnica de cálculo y análisis que agiliza y optimiza el procedimiento en nuestros diseños.',
                    'Diseño y fabricación de calderas pirotubulares, acuotubulares y mixtas para quema de cualquier tipo de combustible',
                    'Diseño y fabricación de Parrillas viajeras, volcables o fijas y la adaptación a calderas nuevas o existentes.',
                    'Diseño y fabricación de intercambiadores de calor bajo código ASME y TEMA',
                    'Diseño y fabricación de tanques bajo código ASME y API',
                    'Diseño y fabricación de sistemas de captación de particulado, ciclones de alta eficiencia, multiciclones y filtros de mangas para dar cumplimiento a la norma ambiental vigente.',
                ],
            ],
        ];
    }

    public static function getBySlug(string $slug): array {
        foreach (self::getAll() as $s) if ($s['slug'] === $slug) return $s;
        return self::getAll()[0];
    }

    public static function getStats(): array {
        return [
            ['number' => '500+', 'label' => 'PROYECTOS ASESORADOS'],
            ['number' => '170+', 'label' => 'EMPRESAS GUIADAS'],
            ['number' => '300+', 'label' => 'CLIENTES SATISFECHOS'],
        ];
    }

    public static function getClientLogos(): array {
        return ['l1.png','l2.png','l3.png','l4.png','l5.png','l6.png','l7.png',
                'AGRO.jpg','aritex.jpg','CLINIC.jpg','col.jpg','COTEX.jpg','disin.jpg',
                'FABRICA.jpg','icopores.jpg','ILC.jpg'];
    }
}