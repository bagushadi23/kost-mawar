<div class="container-fluid">
    <table class="table table-responsive">
        <thead>
            <th>Nama</th>
            <th>Email</th>
            <th>NO HP</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach($user as $u):?>
            <tr>
                <td><?php echo $u->nama?></td>
                <td><?php echo $u->email?></td>
                <td><?php echo $u->nohp?></td>
                <td><?php echo $u->alamat?></td>
                <td><?php echo $u->jenis_kelamin?></td>
                <td>
                <a href="<?= base_url().'admin/dashboard/edit/'.$u->id?>"><button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></i></button></a>
                <a href="<?= base_url().'admin/dashboard/deleteuser/'.$u->id?>"><button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>