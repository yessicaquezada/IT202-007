<?php
    require(__DIR__ . "/../partials/nav.php");

    if (!is_logged_in()) {
        flash("You don't have permission to view this page", "warning");
        redirect("home.php");
    }

    $uid = get_user_id();
    $query = "SELECT account_number, account_type, balance, created, id, active from Accounts ";
    $params = null;

    $query .= " WHERE user_id = :uid AND active = 1 AND frozen = 0 AND NOT account_type = :loan";
    $params =  [":uid" => "$uid", ":loan" => "loan"];

    $query .= " ORDER BY created desc";
    $db = getDB();
    error_log("user_id: $uid");
    error_log("query: $query");
    $stmt = $db->prepare($query);
    $accounts = [];
    try {
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $accounts = $results;
            //echo var_export($accounts, true); 
        } else {
            flash("No accounts found", "warning");
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    if (isset($_POST["account_id"]) && isset($_POST["deposit"])) 
    {
        $deposit = (int)se($_POST, "deposit", "", false);
        $aid = se($_POST, "account_id", "", false);
        //flash("world id = $wid");
        $memo = $_POST["memo"];
        if (!($deposit > 0))
        {
            flash("Input a value to deposit (Greater than 0)", "warning");
        }
    }
    else
        flash("Account Not Selected", "warning");
?>

<div class="container-fluid">
    <h2>Deposit</h2>
    <div>
        <form method="POST">
            <div class="mb-3">
                <label for="accountList" class="form-label">Choose an Account to Deposit Money To</label>
                <select class="form-select" name="account_id" id="accountList" autocomplete="off">
                <?php if (!empty($accounts)) : ?>
                    <?php foreach ($accounts as $account) : ?>
                        <option value="<?php se($account, 'id'); ?>">
                            <?php se($account, "account_number"); ?> (Type: <?php se($account, 'account_type'); ?>; Balance = $<?php se($account, "balance"); ?>)
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?> 
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="d">Amount to Deposit</label>
                <input class="form-control" type="number" name="deposit" id="d"></input>
            </div>
            <div class="mb-3">
                <label class="form-label" for="m">Memo</label>
                <input class="form-control" type="text" placeholder="Deposit" aria-label="default input example" name="memo">
            </div>
            <input type="submit" value="Deposit" />
        </form>
    </div>
</div>

<?php
    require_once(__DIR__ . "/../partials/flash.php");
?>