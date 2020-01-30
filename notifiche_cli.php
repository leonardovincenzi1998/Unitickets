<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Notifiche</li>
        </ol>
</nav>
<!--tabella con notifiche-->
<div id="titoloCat" class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-md-12">
            <hr class="orders">
            <h4 class="display-6">Notifiche</h4>
            <hr class="orders">
        </div>
    </div>
</div>
<!-- a tabella con il riepilogo delle notifiche -->
<div id="div_table_riepilogo" class="table-responsive-sm">
    <table id="tableNotifies" class="table table-striped">
        <thead>
            <tr>
                <!-- <th id="cod_id" scope="col">id</th> -->
                <th id="ntf_date" scope="col">Data</th>
                <th id="descr" scope="col">Notifica</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($templateParams["cliente"] as $user): ?>
            <tr>
                <!-- <th headers="cod_id" scope="row"><?php //echo $user["notifies_id"] ?></th> -->
                <td headers="ntf_date"><?php echo $user["notify_date"] ?></td>
                <td headers="descr"><?php echo $user["description"] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
