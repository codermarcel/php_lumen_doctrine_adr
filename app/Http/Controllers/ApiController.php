<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/23/2017
 * Time: 3:43 AM
 */

namespace App\Http\Controllers;

use Domain\Entities\User;
use Laravel\Lumen\Routing\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\TransformerAbstract;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @var null
     */
    private $manager = null;

    /**
     * @return Manager|null
     */
    protected function getManager()
    {
        if ($this->manager === null)
        {
            $manager = new Manager();
            $manager->setSerializer(new JsonApiSerializer($this->getBaseUrl()));

            $this->manager = $manager;
        }

        return $this->manager;
    }

    /**
     * @return mixed|null
     */
    private function getBaseUrl()
    {
        return env('FRACTAL_BASE_URL', 'localhost:777/blog/public');
    }

    /**
     * @param $data
     * @param TransformerAbstract $transformer
     * @param null $type
     * @return array
     */
    public function found($data, TransformerAbstract $transformer, $type = null)
    {
        if ($data instanceof User)
        {
            $copy = $data;
            $data = [];
            $data[] = $copy;
        }

        $resource = new Collection($data, $transformer, $type);

        return $this->getManager()->createData($resource)->toArray();
    }

    /**
     * @param $entity_id
     */
    public function created($entity_id)
    {

    }
}