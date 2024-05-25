        <table border="1">
            <thead>
                <tr>
                    <th class="col-md-2">No</th>
                    <th class="col-md-3">Nama Lengkap</th>
                    <th class="col-md-1">Tajwid</th>
                    <th class="col-md-1">Fashohah</th>
                    <th class="col-md-2">Hafalan</th>
                    <th class="col-md-2">C1</th>
                    <th class="col-md-2">C2</th>
                    <th class="col-md-2">C3</th>
                    <th class="col-md-2">Minimum Distance</th>
                    <th class="col-md-2">Cluster</th>
                </tr>
            <tbody>
                @foreach($data as $key => $d)
                <tr>
                    <td>{{ $key + 1}}</td>
                    <td>{{ $d->nama_santri}}</td>
                    <td>{{ $d->nilai_t}}</td>
                    <td>{{ $d->nilai_f}}</td>
                    <td>{{ $d->nilai_h}}</td>
                    <td>{{ $d->c0}}</td>
                    <td>{{ $d->c1}}</td>
                    <td>{{ $d->c2}}</td>
                    <td>{{ $d->mindis}}</td>
                    <td>{{ $d->cluster}}</td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
        <table border="1">
            <thead>
                <tr>
                    <th class="col-md-2">Jumlah</th>
                    <th class="col-md-3">C1</th>
                    <th class="col-md-3">C2</th>
                    <th class="col-md-3">C3</th>
                </tr>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>{{ $count_c0}}</td>
                    <td>{{ $count_c1}}</td>
                    <td>{{ $count_c2}}</td>
                </tr>
            </tbody>
            </thead>
        </table>
        <table border="1">
            <thead>
                <tr>
                    <th class="col-md-2">Cluster</th>
                    <th class="col-md-3">Nilai T</th>
                    <th class="col-md-3">Nilai F</th>
                    <th class="col-md-3">Nilai H</th>
                </tr>
            <tbody>
                <tr>
                    <td>C1</td>
                    <td>{{ $sum_t_c0 / $count_c0}}</td>
                    <td>{{ $sum_f_c0 / $count_c0}}</td>
                    <td>{{ $sum_h_c0 / $count_c0}}</td>
                </tr>
                <tr>
                    <td>C2</td>
                    <td>{{ $sum_t_c1 / $count_c1}}</td>
                    <td>{{ $sum_f_c1 / $count_c1}}</td>
                    <td>{{ $sum_h_c1 / $count_c1}}</td>
                </tr>
                <tr>
                    <td>C3</td>
                    <td>{{ $sum_t_c2 / $count_c2}}</td>
                    <td>{{ $sum_f_c2 / $count_c2}}</td>
                    <td>{{ $sum_h_c2 / $count_c2}}</td>
                </tr>
            </tbody>
            </thead>
        </table>