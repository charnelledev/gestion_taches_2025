<?php
class TacheController {
    private $tacheModel;

    public function __construct($pdo) {
        $this->tacheModel = new Tache($pdo);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $id_utilisateur = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté

            $this->tacheModel->addTask($titre, $description, $type, $id_utilisateur);
            header("Location: /tasks.php");
            exit();
        }
    }

    public function list() {
        return $this->tacheModel->getTasksByUser($_SESSION['user_id']);
    }
}
?>
