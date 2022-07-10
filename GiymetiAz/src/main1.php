        <section id="main" role="main">
            <?php
                $sql = "SELECT * FROM `content` WHERE `menu`=$mid LIMIT 1";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) $content = $row
            ?>
            <h1 class="archive-title"><?=$content['title']?></h1>
            <div id="archive">
                <div class="products">
                    <div class="product">
                        <div class="thumbnail"><a href="https://qiymeti.net/kondisioner/yoshiro-yac-m18oa521/"
                                title="YOSHIRO YAC-M18OA521 qiymeti"><img width="150" height="150"
                                    src="./Kondisioner Qiymetleri - Qiyməti, Qiymətləri!_files/yoshiro-yac-m18oa521-qiymeti-150x150.jpg"
                                    class="wp-post-image" alt="YOSHIRO YAC-M18OA521" loading="lazy"
                                    title="YOSHIRO YAC-M18OA521"
                                    data-src="https://qiymeti.net/wp-content/uploads/yoshiro-yac-m18oa521-qiymeti-150x150.jpg"></a>
                        </div>
                        <div class="name"><a href="https://qiymeti.net/kondisioner/yoshiro-yac-m18oa521/"
                                title="YOSHIRO YAC-M18OA521 qiymeti">YOSHIRO YAC-M18OA521</a></div>
                        <div class="min-price"><span>1 299<span class="fraction">,00</span></span> AZN</div>
                        <div class="specifications">50 kvadrat metr i̇ş sahəsi, Uzaqdan idarə etmə var, 18000 BTU
                            soyutma qabiliyyəti, White/Black/White/White/Silver rəng</div>
                    </div>
                    <div class="pagination"><span aria-current="page" class="page-numbers current">1</span>
                        <a class="page-numbers" href="https://qiymeti.net/qiymetleri/kondisioner/page/2/">2</a>
                        <span class="page-numbers dots">…</span>
                        <a class="page-numbers" href="https://qiymeti.net/qiymetleri/kondisioner/page/25/">25</a>
                        <a class="next page-numbers" href="https://qiymeti.net/qiymetleri/kondisioner/page/2/">Sonrakı
                            »</a>
                    </div>
                </div>
            </div>

            <div id="category-content"><?=$content['text']?></div>


            <div id="sidebar">
                <ul id="filters">
                    <li class="filter brands" data-group="brands">
                        <div class="filter-header-title">Marka</div>
                        <div class="filter-search"><input type="text" placeholder="Marka axtar"></div>
                        <div class="filter-content">
                        <?php
                            $sql = "SELECT * FROM `make` WHERE `menu`=$mid ORDER BY `id`";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="option">
                                <label>
                                    <input id="brands-option-1685" type="checkbox" class="checkbox">
                                    <span class="checkmark"></span>
                                    <a class="option-text" href="https://qiymeti.net/qiymetleri/kondisioner/aux/"><?=$row['name']?></a>
                                    <!-- <span class="option-count">(53)</span> -->
                                </label>
                            </div>

                        <?php
                            }
                        ?>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <footer id="footer">
            <div class="footer">
                <div class="company">
                    <div class="footer-heading">Qiymeti.net</div>
                    <a href="https://qiymeti.net/iletisim/" style="padding-left: 0px;">Əlaqə yaradın: Mağazanızı
                        yerləşdirin / Reklam verin</a>
                </div>
                <div class="social-accounts">
                    <p><a href="https://qiymeti.net/qiymetleri/">Qiymetleri</a> gör, en ucuzunu al!</p>
                </div>
            </div>
            <div class="copyright">Copyright © 2014 - 2022. Bütün hüquqları qorunur. Bu saytı istifadə edən
                istifadəçilər <a href="https://qiymeti.net/gizlilik-ilkesi/">Konfidensiallıq Siyasəti</a> və <a
                    href="https://qiymeti.net/hizmet-kosullari/">Xidmət Şərtləri</a>ni qəbul etmiş sayılırlar.</div>
        </footer>
    </div>
</body>
</html>