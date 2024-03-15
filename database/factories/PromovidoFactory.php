<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promovido>
 */
class PromovidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seccion_elec' => $this->faker->numberBetween(1000, 9999),
            'nombre' => $this->faker->firstName,
            'apellido_pat' => $this->faker->lastName,
            'apellido_mat' => $this->faker->lastName,
            'domicilio' => $this->faker->address,
            'localidad' => $this->faker->city,
            'clave_elec' => $this->faker->regexify('[A-Za-z0-9]{18}'),
            'curp' => $this->faker->unique()->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
            'tel_celular' => $this->faker->phoneNumber,
            'tel_fijo' => $this->faker->phoneNumber,
            'correo' => $this->faker->unique()->safeEmail,
            'facebook' => $this->faker->userName,
            'id_ocupacion' => $this->faker->numberBetween(1, 6),
            'escolaridad' => $this->faker->randomElement(['Primaria', 'Secundaria', 'Preparatoria', 'Licenciatura','Ninguna']),
            'fecha_captura' => now(),
            'genero' => $this->faker->randomElement(['H', 'M']),
            'edad' => $this->faker->numberBetween(18, 60),
            'id_usuario' => $this->faker->numberBetween(1, 4),
        ];
    }
}
