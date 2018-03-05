<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 24/02/2018
 * Time: 18:43
 */

namespace App\DataFixtures;

use App\Entity\Ciclo;
use App\Entity\Profesor;
use App\Entity\Provincia;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $provincias = $this->generarProvincias();
        $provincias_lenght = count($provincias);
        for ($i = 0; $i < $provincias_lenght; $i++) {
            $provincia = new Provincia();
            $provincia->setNombre($provincias[$i]);
            $manager->persist($provincia);
        }

        $ciclos = $this->generarCiclos();
        foreach ($ciclos as $valorCiclo){
            $ciclo = new Ciclo();
            $ciclo->setCodigo($valorCiclo['codigo']);
            $ciclo->setNombre($valorCiclo['nombre']);
            $ciclo->setGrado($valorCiclo['grado']);
            $ciclo->setHoras($valorCiclo['horas']);
            $manager->persist($ciclo);
        }

        $profesor = $this->generarAdmin();
        $manager->persist($profesor);

        $manager->flush();
    }

    public function generarProvincias()
    {
        return ['Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara','Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra','Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona','Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];
    }

    public function generarCiclos()
    {
        return [
            ['codigo' => 'DAW', 'nombre' => 'Desarrollo de Aplicaciones Web', 'grado' => 'Superior', 'horas' => 2000],
            ['codigo' => 'ASIR', 'nombre' => 'Administración de Sistemas Informáticos en Red', 'grado' => 'Superior', 'horas' => 2000],
            ['codigo' => 'GVEC', 'nombre' => 'Gestión de Ventas y Espacios Comerciales', 'grado' => 'Superior', 'horas' => 2000],
            ['codigo' => 'AFI', 'nombre' => 'Administración y Finanzas', 'grado' => 'Superior', 'horas' => 2000],
            ['codigo' => 'SMR', 'nombre' => 'Sistemas Microinformáticos y Redes', 'grado' => 'Medio', 'horas' => 2000],
            ['codigo' => 'GA', 'nombre' => 'Gestión Administrativa', 'grado' => 'Medio', 'horas' => 2000],
            ['codigo' => 'AC', 'nombre' => 'Actividades Comerciales', 'grado' => 'Medio', 'horas' => 2000],
        ];
    }

    public function generarAdmin()
    {
        $profesor = new Profesor();
        $profesor->setNif("49324467H");
        $profesor->setNombre("admin");
        $profesor->setApellido1("admin");
        $profesor->setApellido2("admin");
        $profesor->setMovil("654321778");
        $profesor->setUsername("admin");
        $profesor->setPlainPassword("admin");
        $profesor->setEmail("admin@mail.com");
        $profesor->setEnabled(true);
        $profesor->setRoles(['ROLE_ADMIN']);

        return $profesor;
    }
}