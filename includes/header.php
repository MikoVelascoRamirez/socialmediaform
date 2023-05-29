<?php
    session_start();
?>

<header>
    <nav>
        <a>El blog del Maik</a>
        <ul>
            <li>Home</li>
            <li>About me</li>
            <li>Preferences</li>
            <li>Store</li>
        </ul>
        <section>
            <a>
                <button>
                    <?php
                        if(!isset($_SESSION['username'])){ echo "SIGN UP"; } 
                        else{ echo $_SESSION['username']; }                        
                    ?>
                </button>
            </a>
            <a href="./includes/destroySession.inc.php">
                <button>
                    <?php
                        if(!isset($_SESSION['username'])){ echo "LOGIN"; } 
                        else{ echo "LOGOUT"; }
                    ?>
                </button>
            </a>
        </section>
    </nav>
</header>