<table class="table table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">Rendez-vous du patient</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($displayAppointments as $patient) { ?>
            <tr class="table-light">
            <td scope="row">Le <?=  date('d/m/Y à H:i', strtotime($patient->dateHour))?></td>
            </tr>
            <?php }?>
        </tbody>
</table>
    </div>
</div>