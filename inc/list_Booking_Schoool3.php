<?php
$std_counselled_3 = mysqli_query($con, "SELECT tr_class FROM std_eps WHERE stdID='$stdID' AND epName='$ep3' ");
$num_rows = mysqli_num_rows($std_counselled);

$is_finished_3 = "";
if ($num_rows > 0) {
    while ($row_counselled_3 = mysqli_fetch_array($std_counselled_3)) {
        $is_finished_3 = $row_counselled_3[0];
    }
}

if ($is_finished_3 == "finish") {
    echo "<input type='text' class='form-control' name='ep3' id='ep3' value='$ep3' readonly />";
} else {
    ?>

    <select class="form-control" name="ep3" id="ep3">
        <option value=""></option>

        <optgroup label="University">
            <option value="Bond-3jY3f" <?php echo ($ep3 == "Bond-3jY3f") ? "selected='selected'" : "" ?>>Bond</option>
            <option value="CQU-75ysT" <?php echo ($ep3 == "CQU-75ysT") ? "selected='selected'" : "" ?>>CQU</option>
            <option value="CSU-gU3ea" <?php echo ($ep3 == "CSU-gU3ea") ? "selected='selected'" : "" ?>>CSU Study Centres
            </option>
            <option value="Griffith-89hH9" <?php echo ($ep3 == "Griffith-89hH9") ? "selected='selected'" : "" ?>>
                Griffith
            </option>
            <option value="JCUB-83Tsj" <?php echo ($ep3 == "JCUB-83Tsj") ? "selected='selected'" : "" ?>>JCUB</option>
            <option value="QUT-3bjE4" <?php echo ($ep3 == "QUT-3bjE4") ? "selected='selected'" : "" ?>>QUT</option>
            <option value="UQ-9jIUE" <?php echo ($ep3 == "UQ-9jIUE") ? "selected='selected'" : "" ?>>UQ</option>
            <option value="USC-18iud" <?php echo ($ep3 == "USC-18iud") ? "selected='selected'" : "" ?>>USC</option>
        </optgroup>

        <optgroup label="VET/Language">
            <option value="ALS-B7eDe" <?php echo ($ep3 == "ALS-B7eDe") ? "selected='selected'" : "" ?>>ALS</option>
            <option value="CTI-4igjA" <?php echo ($ep3 == "CTI-4igjA") ? "selected='selected'" : "" ?>>CTI</option>
            <option value="Embassy-fiEde" <?php echo ($ep3 == "Embassy-fiEde") ? "selected='selected'" : "" ?>>Embassy
            </option>
            <option value="ILSC-biEDe" <?php echo ($ep3 == "ILSC-biEDe") ? "selected='selected'" : "" ?>>ILSC</option>
            <option value="Kaplan-buEdj" <?php echo ($ep3 == "Kaplan-buEdj") ? "selected='selected'" : "" ?>>Kaplan
            </option>
            <option value="LCB-3sT5i" <?php echo ($ep3 == "LCB-3sT5i") ? "selected='selected'" : "" ?>>Le Cordon Bleu
            </option>
            <option value="QAT-gueEd" <?php echo ($ep3 == "QAT-gueEd") ? "selected='selected'" : "" ?>>QAT</option>
            <option value="TAFE Queensland-S89aA" <?php echo ($ep3 == "TAFE Queensland-S89aA") ? "selected='selected'" : "" ?>>
                TAFE Queensland
            </option>
        </optgroup>

        <optgroup label="Interstate">
            <option value="UTAS-as3sT" <?php echo ($ep3 == "UTAS-as3sT") ? "selected='selected'" : "" ?>>UTAS</option>
        </optgroup>

        <optgroup label="Migration / Others">
            <option value="Namo Migration-r95jF" <?php echo ($ep3 == "Namo Migration-r95jF") ? "selected='selected'" : "" ?>>
                Namo Migration
            </option>
            <option value="Peter Migration-389cd" <?php echo ($ep3 == "Peter Migration-389cd") ? "selected='selected'" : "" ?>>
                Peter Migration
            </option>
            <option value="Applied and Collect the Gift-394ad" <?php echo ($ep3 == "Applied and Collect the Gift-394ad") ? "selected='selected'" : "" ?>>
                Applied and Collect the Gift
            </option>
        </optgroup>
    </select>

<?php } ?>
<!--<option value=""></option>

<optgroup label="University">
	<option value="QUT-3bjE4" <?php echo ($ep3 == "QUT-3bjE4") ? "selected='selected'" : "" ?>>QUT</option>
	<option value="UQ-9jIUE" <?php echo ($ep3 == "UQ-9jIUE") ? "selected='selected'" : "" ?>>UQ</option>
	<option value="Griffith-89hH9" <?php echo ($ep3 == "Griffith-89hH9") ? "selected='selected'" : "" ?>>Griffith</option>
	<option value="USC-18iud" <?php echo ($ep3 == "USC-18iud") ? "selected='selected'" : "" ?>>USC</option>
	<option value="Torrens-di4Ea" <?php echo ($ep3 == "Torrens-di4Ea") ? "selected='selected'" : "" ?>>Torrens</option>
</optgroup>

<optgroup label="TAFE/College">
	<option value="TAFE Queensland-S89aA" <?php echo ($ep3 == "TAFE Queensland-S89aA") ? "selected='selected'" : "" ?>>TAFE Queensland</option>
	<option value="Kaplan-buEdj" <?php echo ($ep3 == "Kaplan-buEdj") ? "selected='selected'" : "" ?>>Kaplan</option>
	<option value="CTI-4igjA" <?php echo ($ep3 == "CTI-4igjA") ? "selected='selected'" : "" ?>>CTI</option>
</optgroup>

<optgroup label="English School">
	<option value="ALS-B7eDe" <?php echo ($ep3 == "ALS-B7eDe") ? "selected='selected'" : "" ?>>ALS</option>
	<option value="QAT-gueEd" <?php echo ($ep3 == "QAT-gueEd") ? "selected='selected'" : "" ?>>QAT</option>
	<option value="Embassy-fiEde" <?php echo ($ep3 == "Embassy-fiEde") ? "selected='selected'" : "" ?>>Embassy</option>
	<option value="ILSC-biEDe" <?php echo ($ep3 == "ILSC-biEDe") ? "selected='selected'" : "" ?>>ILSC</option>
	<option value="LEXIS-dkAda" <?php echo ($ep3 == "LEXIS-dkAda") ? "selected='selected'" : "" ?>>LEXIS</option>
	<option value="Navitas-45bfa" <?php echo ($ep3 == "Navitas-45bfa") ? "selected='selected'" : "" ?>>Navitas</option>
</optgroup>

<optgroup label="Migration / Others">
	<option value="Namo Migration-r95jF" <?php echo ($ep3 == "Namo Migration-r95jF") ? "selected='selected'" : "" ?>>Namo Migration</option>
	<option value="Peter Migration-389cd" <?php echo ($ep3 == "Peter Migration-389cd") ? "selected='selected'" : "" ?>>Peter Migration</option>
	<option value="Others-49b2a" <?php echo ($ep3 == "Others-49b2a") ? "selected='selected'" : "" ?>>Others</option>
	<option value="NP-38gA3" <?php echo ($ep3 == "NP-38gA3") ? "selected='selected'" : "" ?>>NP</option>
	<option value="Applied and Collect the Gift-394ad" <?php echo ($ep3 == "Applied and Collect the Gift-394ad") ? "selected='selected'" : "" ?>>Applied and Collect the Gift</option>
</optgroup>-->