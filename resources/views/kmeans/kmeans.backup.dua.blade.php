<!DOCTYPE html>
<html>

<head>
    <title>K-Means Clustering</title>
</head>

<body>
    <h1>Hasil K-Means Clustering</h1>

    @foreach ($iterations as $index => $iteration)
    <h2>Iterasi {{ $index + 1 }}</h2>
    <h3>Centroids</h3>
    <ul>
        <li>Centroid 0: (T: {{ $iteration['centroids'][0]['nilai_t'] }}, F: {{ $iteration['centroids'][0]['nilai_f'] }},
            H: {{ $iteration['centroids'][0]['nilai_h'] }})</li>
        <li>Centroid 1: (T: {{ $iteration['centroids'][1]['nilai_t'] }}, F: {{ $iteration['centroids'][1]['nilai_f'] }},
            H: {{ $iteration['centroids'][1]['nilai_h'] }})</li>
        <li>Centroid 2: (T: {{ $iteration['centroids'][2]['nilai_t'] }}, F: {{ $iteration['centroids'][2]['nilai_f'] }},
            H: {{ $iteration['centroids'][2]['nilai_h'] }})</li>
    </ul>

    <h3>Data Points</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Nilai T</th>
                <th>Nilai F</th>
                <th>Nilai H</th>
                <th>Cluster</th>
                <th>C0</th>
                <th>C1</th>
                <th>C2</th>
                <th>Min Distance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($iteration['data'] as $data)
            <tr>
                <td>{{ $data['nilai_t'] }}</td>
                <td>{{ $data['nilai_f'] }}</td>
                <td>{{ $data['nilai_h'] }}</td>
                <td>{{ $data['cluster'] }}</td>
                <td>{{ $data['c0'] }}</td>
                <td>{{ $data['c1'] }}</td>
                <td>{{ $data['c2'] }}</td>
                <td>{{ $data['mindis'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
</body>

</html>