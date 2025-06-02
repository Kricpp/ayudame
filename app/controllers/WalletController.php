<?php 
class WalletController extends Controller {
    
    public function recharge() {
        if (!isset($_SESSION['user_id'])) redirect('auth/login');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = $this->model('User');
            $amount = floatval($_POST['amount']);
            
            if ($amount > 0) {
                if ($userModel->updateWallet($_SESSION['user_id'], $amount, 'recarga', 'Recarga de saldo')) {
                    redirect('wallet/recharge?success=1');
                } else {
                    $data['error'] = 'Error al recargar saldo';
                }
            } else {
                $data['error'] = 'Monto inválido';
            }
        }
        
        $userModel = $this->model('User');
        $data['user'] = $userModel->getUserById($_SESSION['user_id']);
        
        if (isset($_GET['success'])) {
            $data['success'] = 'Saldo recargado exitosamente';
        }
        
        $this->renderWalletView('recharge', $data);

    }
    
    public function history() {
        if (!isset($_SESSION['user_id'])) redirect('auth/login');
        
        $transactionModel = $this->model('WalletTransaction');
        $data['transactions'] = $transactionModel->getUserTransactions($_SESSION['user_id']);
        
        $userModel = $this->model('User');
        $data['user'] = $userModel->getUserById($_SESSION['user_id']);
        
        $this->renderWalletView('history', $data);
    }

        // Método para renderizar vistas de wallet con formato consistente
    private function renderWalletView($view, $data = []) {
        if (file_exists('../app/views/wallet/' . $view . '.php')) {
            extract($data);
            include '../app/views/wallet/' . $view . '.php';
        } else {
            echo "<h1>Vista no encontrada</h1>";
            echo "<p>La vista wallet/$view no existe.</p>";
            echo "<a href='" . BASE_URL . "dashboard'>Volver al Dashboard</a>";
        }
    }

}