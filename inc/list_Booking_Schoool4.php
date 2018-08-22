<?php
$std_counselled_4 = mysqli_query($con, "SELECT tr_class FROM std_eps WHERE stdID='$stdID' AND epName='$ep4' ");
$num_rows = mysqli_num_rows($std_counselled);

$is_finished_4 = "";
if ($num_rows > 0) {
    while ($row_counselled_4 = mysqli_fetch_array($std_counselled_4)) {
        $is_finished_4 = $row_counselled_4[0];
    }
}

if ($is_finished_4 == "finish") {
    echo "<input type='text' class='form-control' name='ep4' id='ep4' value='$ep4' readonly />";
} else {
    ?>

    <select class="form-control" name="ep4" id="ep4">
        <option value=""></option>

        <optgroup label="University">
            <option value="Bond-3jY3f" <?php echo ($ep4 == "Bond-3jY3f") ? "selected='selected'" : "" ?>>Bond</option>
            <option value="CQU-75ysT" <?php echo ($ep4 == "CQU-75ysT") ? "selected='selected'" : "" ?>>CQU</option>
            <option value="CSU-gU3ea" <?php echo ($ep4 == "CSU-gU3ea") ? "selected='selected'" : "" ?>>CSU Study
                Centres
            </option>
            <option value="Griffith-89hH9" <?php echo ($ep4 == "Griffith-89hH9") ? "selected='selected'" : "" ?>>
                Griffith
            </option>
            <option value="JCUB-83Tsj" <?php echo ($ep4 == "JCUB-83Tsj") ? "selected='selected'" : "" ?>>JCUB</option>
            <option value="QUT-3bjE4" <?php echo ($ep4 == "QUT-3bjE4") ? "selected='selected'" : "" ?>>QUT</option>
            <option value="UQ-9jIUE" <?php echo ($ep4 == "UQ-9jIUE") ? "selected='selected'" : "" ?>>UQ</option>
            <option value="USC-18iud" <?php echo ($ep4 == "USC-18iud") ? "selected='selected'" : "" ?>>USC</option>
        </optgroup>

        <optgroup label="VET/Language">
            <option value="ALS-B7eDe" <?php echo ($ep4 == "ALS-B7eDe") ? "selected='selected'" : "" ?>>ALS</option>
            <option value="CTI-4igjA" <?php echo ($ep4 == "CTI-4igjA") ? "selected='selected'" : "" ?>>CTI</option>
            <option value="Embassy-fiEde" <?php echo ($ep4 == "Embassy-fiEde") ? "selected='selected'" : "" ?>>Embassy
            </option>
            <option value="ILSC-biEDe" <?php echo ($ep4 == "ILSC-biEDe") ? "selected='selected'" : "" ?>>ILSC</option>
            <option value="Kaplan-buEdj" <?php echo ($ep4 == "Kaplan-buEdj") ? "selected='selected'" : "" ?>>Kaplan
            </option>
            <option value="LCB-3sT5i" <?php echo ($ep4 == "LCB-3sT5i") ? "selected='selected'" : "" ?>>Le Cordon Bleu
            </option>
            <option value="QAT-gueEd" <?php echo ($ep4 == "QAT-gueEd") ? "selected='selected'" : "" ?>>QAT</option>
            <option value="TAFE Queensland-S89aA" <?php echo ($ep4 == "TAFE Queensland-S89aA") ? "selected='selected'" : "" ?>>
                TAFE Queensland
            </option>
        </optgroup>

        <optgroup label="Interstate">
            <option value="UTAS-as3sT" <?php echo ($ep4 == "UTAS-as3sT") ? "selected='selected'" : "" ?>>UTAS</option>
        </optgroup>

        <optgroup label="Migration / Others">
            <option value="Namo Migration-r95jF" <?php echo ($ep4 == "Namo Migration-r95jF") ? "selected='selected'" : "" ?>>
                Namo Migration
            </option>
            <option value="Peter Migration-389cd" <?php echo ($ep4 == "Peter Migration-389cd") ? "selected='selected'" : "" ?>>
                Peter Migration
            </option>
            <option value="Applied and Collect the Gift-394ad" <?php echo ($ep4 == "Applied and Collect the Gift-394ad") ? "selected='selected'" : "" ?>>
                Applied and Collect the Gift
            </option>
        </optgroup>
    </select>
<?php } ?>