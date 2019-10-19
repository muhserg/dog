<?php

namespace dog\controllers;

use dog\base\DogArray;
use dog\services\Dog;

/**
 * Class DogController
 * @package dog\controllers
 */
class DogController extends Controller
{
    use LogTrait;

    /**
     * @var int максимальное число символов, которое может быть в CSV файле. Задается для увеличения бытродействия.
     */
    const CHUNK_LENGTH = 1000;

    /**
     * @var Dog
     */
    private $dogRepository;

    /**
     * @var DogArray
     */
    private $dogArray;

    public function __construct(Dog $dog, DogArray $dogArray)
    {
        $this->dogArray = $dogArray;
        $this->dogRepository = $dog;
    }

    public function indexAction()
    {
        $this->view('index');
    }

    public function fillAction($file)
    {
        try {
            //todo проверки на расширение и размер загружаемого файла

            if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
                while (($data = fgetcsv($handle, self::CHUNK_LENGTH, ",")) !== FALSE) {
                    $this->dogArray->fill($data[0], (int)$data[1], $data[2], $data[3], $data[4], $data[5]);
                }
                fclose($handle);
            }

            echo 'Данные успешно загружены';
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            echo 'Не удалось загрузить свойства собаки.';
        }
    }

    public function findAction($request)
    {
        $this->view('search', [
            'dogs' => $this->dogRepository->findDog($request->all()),
        ]);
    }

    public function profileAction($dogId)
    {
        $this->view('profile', [
            'profile' => $this->dogRepository->findDog(['id' => $dogId]),
        ]);
    }
}
