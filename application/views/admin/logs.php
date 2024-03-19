<section class="section-container">
    <div class="container">
    <div class="row">
            <div class="col-md-12 text-center p-2">
                <span class="title">Logs</span>
            </div>
        </div>

    <div class="row">
            <div class="col-md-12 table-wrapper p-2">
                <table class="display table-sm table table-borderd table-stripped" id="logs">
                    <thead>
                        <th scope="col">User</th>
                        <th scope="col">Action</th>
                        <th scope="col">Time</th>
                    </thead> 
                    <tbody>
                        <?php foreach($logs as $log):?>
                        <tr>
                           
                            <td><?= (is_int($log->user)) ? getUserNames($log->user) : $log->user ?></td>
                            <td><?= $log->action?></td>
                            <td><?= readableDate($log->time)?></td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>