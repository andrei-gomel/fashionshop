<?php include ROOT . '/views/admin/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/product/">Управление товарами</a></li>
                </ol>
            </div><center>
                <h4>Удалить товар № <?=$id?></h4>
                <p>Вы действительно хотите удалить этот товар?</p>
                <form method="post" action="#">
                    <input type="submit" name="submit" value="Удалить">
                </form>

            </center>

        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer_admin.php'; ?>