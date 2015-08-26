<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../src/Client.php';

    $app['debug'] = true;

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get('/', function() use($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post('/stylists', function() use($app) {
        $id = null;
        $stylist = new Stylist($_POST['name'], $id);
        $stylist->save();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post('/delete_stylists', function() use($app) {
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post('/delete_clients', function() use($app) {
        Client::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/stylists/{id}', function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('stylists' => $stylist, 'client' => $stylist->getClients()));
    });

    $app->post('clients', function() use($app) {
        $name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($name, $id = null, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        $clients = $stylist->getClients();
        return $app['twig']->render('stylist.html.twig', array('stylists' => $stylist, 'client' => $clients));
    });

    $app->get('/stylists/{id}/edit', function($id) use($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist_edit.html.twig', array('stylists' => $stylist));
    });

    $app->patch('/stylists/{id}', function($id) use($app) {
        $name = $_POST['name'];
        $stylist = Stylist::find($id);
        $stylist->update($name);
        return $app['twig']->render('stylist.html.twig', array('stylists' => $stylist, 'clients' => $stylist->getClients()));
    });

    $app->delete('/stylists/{id}', function($id) use($app) {
        $stylist = Stylist::find($id);
        $stylist->delete();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/clients/{id}/edit', function($id) use($app) {
        $client = Client::find($id);
        $stylist_id = $client->getStylistId();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('client_edit.html.twig', array('clients' => $client, 'stylists' => $stylist));
    });

    $app->patch('/clients/{id}', function($id) use($app) {
        $client = Client::find($id);
        $stylist_id = $_POST['stylist_id'];
        $stylist = Stylist::find($stylist_id);
        foreach ($_POST as $field => $new_value) {
            if (!empty($new_value)) {
                $client->update($field, $new_value);
            }
        }
        return $app['twig']->render('stylist.html.twig', array('stylists' => $stylist, 'clients' => $stylist->getClients()));
    });

    $app->delete('/clients/{id}', function($id) use($app) {
        $client = Client::find($id);
        $stylist = Stylist::find($client->getStylistId());
        $client->delete();
        return $app['twig']->render('stylist.html.twig', array('stylists' => $stylist, 'clients' => $stylist->getClients()));
    });

    return $app;
?>
