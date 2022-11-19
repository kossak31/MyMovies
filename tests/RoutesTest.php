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

    public function testRoutes()
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


        $this->assertEquals(200, $raiz->getStatusCode());
        $this->assertEquals(200, $filmes->getStatusCode());
        $this->assertEquals(200, $filme_show->getStatusCode());
        $this->assertEquals(200, $search->getStatusCode());
        $this->assertEquals(200, $filme_add->getStatusCode());
    }

    public function testDeleteMovie()
    {

       
       
        $connection = Connection::make();
        $queryBuilder = new QueryBuilder($connection);

        $last = $queryBuilder->getLast('movie', 'App\Model\Movie');

        $delete = $this->http->request('DELETE', 'http://localhost/Movies/admin/filmes/' . $last->id);
        $this->assertEquals(200, $delete->getStatusCode());
    }
}
