<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 24/02/2018
 * Time: 18:43
 */

namespace App\DataFixtures;

use App\Entity\Ciclo;
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
        foreach ($ciclos as $codigo => $nombre){
            $ciclo = new Ciclo();
            $ciclo->setCodigo($codigo);
            $ciclo->setNombre($nombre);
            $ciclo->setGrado('Superior');
            $ciclo->setHoras(2000);
            $manager->persist($ciclo);
        }

        $manager->flush();
    }

    public function generarProvincias()
    {
        return ['Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Barcelona','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara','Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra','Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona','Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];
    }

    public function generarCiclos()
    {
        return [
            'DAW' => 'Desarrollo de Aplicaciones Web',
            'DAM' => 'Desarrollo de Aplicaciones Multiplataforma'
        ];
    }
}