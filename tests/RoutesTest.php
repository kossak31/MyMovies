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
        $filmes = $this->http->request('GET', 'http://localhost/Movies/filmes');
        $filme_show = $this->http->request('GET', 'http://localhost/Movies/filmes/1');
       
        $search = $this->http->request('GET', 'http://localhost/Movies', ['search' => 'search=money']);
       
        $filme_add = $this->http->request('POST', 'http://localhost/Movies/filmes', [
            'form_params' => [
                'name' => 'teste',
                'year' => '2020',
                'country' => 'Portugal',
                'director_id' => '1',
                'genre' => '1',
                'actor' => '1'
            ]

        ]);

        $genero_add = $this->http->request('POST', 'http://localhost/Movies/generos', [
            'form_params' => [
                'name' => 'teste',
            ]

        ]);

        $actor_add = $this->http->request('POST', 'http://localhost/Movies/atores', [
            'form_params' => [
                'name' => 'teste',
            ]

        ]);

        $realizador_add = $this->http->request('POST', 'http://localhost/Movies/realizadores', [
            'form_params' => [
                'name' => 'teste',
            ]

        ]);




        $generos = $this->http->request('GET', 'http://localhost/Movies/generos');
        $genero_show = $this->http->request('GET', 'http://localhost/Movies/generos/1');

        $realizadores = $this->http->request('GET', 'http://localhost/Movies/realizadores');
        $realizador_show = $this->http->request('GET', 'http://localhost/Movies/realizadores/1');

        $actores = $this->http->request('GET', 'http://localhost/Movies/actores');
        $actor_show = $this->http->request('GET', 'http://localhost/Movies/actores/1');




        $this->assertEquals(200, $raiz->getStatusCode());
        $this->assertEquals(200, $filmes->getStatusCode());
        $this->assertEquals(200, $filme_show->getStatusCode());
        $this->assertEquals(200, $search->getStatusCode());
        $this->assertEquals(200, $filme_add->getStatusCode());
        $this->assertEquals(200, $generos->getStatusCode());
        $this->assertEquals(200, $genero_show->getStatusCode());
        $this->assertEquals(200, $realizadores->getStatusCode());
        $this->assertEquals(200, $realizador_show->getStatusCode());
        $this->assertEquals(200, $actores->getStatusCode());
        $this->assertEquals(200, $actor_show->getStatusCode());
    }

    public function testRotaDelete()
    {



        $connection = Connection::make();
        $queryBuilder = new QueryBuilder($connection);

        $last_movie = $queryBuilder->getLast('movie', 'App\Model\Movie');
        $last_actor = $queryBuilder->getLast('actor', 'App\Model\Actor');
        $last_director = $queryBuilder->getLast('director', 'App\Model\Director');
        $last_genre = $queryBuilder->getLast('genre', 'App\Model\Genre');

        $filme_delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/filmes/' . $last_movie->id);
        $actor_delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/atores/' . $last_actor->actor_id);
        $realizador_delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/realizadores/' . $last_director->director_id);
        $genero_delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/generos/' . $last_genre->genre_id);

        $this->assertEquals(200, $filme_delete->getStatusCode());
        $this->assertEquals(200, $actor_delete->getStatusCode());
        $this->assertEquals(200, $realizador_delete->getStatusCode());
        $this->assertEquals(200, $genero_delete->getStatusCode());
        
    }
}
