<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as g;


class RoutesTest extends TestCase
{


    public function setUp(): void
    {
        $this->http = new g(['http_errors' => true, 'debug' => true,]);
    }

    public function tearDown(): void
    {
        $this->http = null;
    }

    public function testRotas()
    {

        $raiz = $this->http->request('GET', 'http://localhost/Movies');
        $search = $this->http->request('GET', 'http://localhost/Movies', ['search' => 'search=money']);

        $filmes = $this->http->request('GET', 'http://localhost/Movies/filmes');
        $filme_show = $this->http->request('GET', 'http://localhost/Movies/filmes/1');

        $generos = $this->http->request('GET', 'http://localhost/Movies/generos');
        $genero_show = $this->http->request('GET', 'http://localhost/Movies/generos/1');

        $realizadores = $this->http->request('GET', 'http://localhost/Movies/realizadores');
        $realizador_show = $this->http->request('GET', 'http://localhost/Movies/realizadores/1');

        $atores = $this->http->request('GET', 'http://localhost/Movies/atores');
        $ator_show = $this->http->request('GET', 'http://localhost/Movies/atores/1');




        $this->assertEquals(200, $raiz->getStatusCode());
        $this->assertEquals(200, $search->getStatusCode());
        $this->assertEquals(200, $filmes->getStatusCode());
        $this->assertEquals(200, $filme_show->getStatusCode());
        $this->assertEquals(200, $generos->getStatusCode());
        $this->assertEquals(200, $genero_show->getStatusCode());
        $this->assertEquals(200, $realizadores->getStatusCode());
        $this->assertEquals(200, $realizador_show->getStatusCode());
        $this->assertEquals(200, $atores->getStatusCode());
        $this->assertEquals(200, $ator_show->getStatusCode());
    }

    public function testRotasPOST()
    {

        $connection = Connection::make();
        $queryBuilder = new QueryBuilder($connection);

        $_SESSION['token'] = Session::generateToken();


        $filme_add = $this->http->request('POST', 'http://localhost/Movies/filmes', [
            'form_params' => [
                'name' => 'PHPUNIT TEST',
                'year' => '2020',
                'country' => 'Portugal',
                'director_id' => '1',
                'trailer' => 'https://www.youtube.com',
                'token' => Session::getToken()
            ]
        ]);

        $last_movie = $queryBuilder->getLast('movie', 'App\Model\Movie');

        $queryBuilder->insertGenresPHPUnit($last_movie->id, 1);

        $queryBuilder->insertActorsPHPUnit($last_movie->id, 1);

        $genero_add = $this->http->request('POST', 'http://localhost/Movies/generos', [
            'form_params' => [
                'name' => 'PHPUNIT TEST',
                'token' => Session::getToken()
            ]

        ]);

        $actor_add = $this->http->request('POST', 'http://localhost/Movies/atores', [
            'form_params' => [
                'name' => 'PHPUNIT TEST',
                'token' => Session::getToken()
            ]

        ]);

        $realizador_add = $this->http->request('POST', 'http://localhost/Movies/realizadores', [
            'form_params' => [
                'name' => 'PHPUNIT TEST',
                'token' => Session::getToken()
            ]

        ]);

        $this->assertEquals(200, $filme_add->getStatusCode());
        $this->assertEquals(200, $genero_add->getStatusCode());
        $this->assertEquals(200, $actor_add->getStatusCode());
        $this->assertEquals(200, $realizador_add->getStatusCode());
    }




    public function testRotasDelete()
    {



        $connection = Connection::make();
        $queryBuilder = new QueryBuilder($connection);

        $last_movie = $queryBuilder->getLast('movie', 'App\Model\Movie');
        $last_actor = $queryBuilder->getLast('actor', 'App\Model\Actor');
        $last_director = $queryBuilder->getLast('director', 'App\Model\Director');
        $last_genre = $queryBuilder->getLast('genre', 'App\Model\Genre');

        $filme_delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/filmes/' . $last_movie->id);
        $actor_delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/atores/' . $last_actor->id);
        $realizador_delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/realizadores/' . $last_director->id);
        $genero_delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/generos/' . $last_genre->id);

        $this->assertEquals(200, $filme_delete->getStatusCode());
        $this->assertEquals(200, $actor_delete->getStatusCode());
        $this->assertEquals(200, $realizador_delete->getStatusCode());
        $this->assertEquals(200, $genero_delete->getStatusCode());
    }
}
