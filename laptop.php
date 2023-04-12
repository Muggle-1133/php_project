
        <div>
            <table id="item">
                <tr style="font-size: 20px;
    font-family: 'IBM Plex Sans KR', sans-serif;">
                    <th style="height: 50px;">노트북 선택</th>
                </tr>
                <?php
                    $t = 1;
                    for($i = 1; $i <= 5; $i++) {
                        echo "<tr>";
                        for($j = 1; $j <= 8; $j++) {
                            echo "<td>$t</td>";
                            $t++;
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
            <div class="btn">
                <button type="button" class="select">
                    선택
                </button>
                <button type="button" class="cancel">
                    취소
                </button>
            </div>
        </div>