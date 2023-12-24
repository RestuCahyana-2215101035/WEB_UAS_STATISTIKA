
<table>
    <thead>
     <tr>
      <th><b>No</b></th>
      <th><b>Score</b></th>
     </tr>
    </thead>
    <tbody>
     @foreach($skors as $score)
     <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $score->skor }}</td>
     </tr>
     @endforeach
    </tbody>
</table>