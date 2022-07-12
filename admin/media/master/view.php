<?php
include('../../dbconnect.php');
$sql = $conn->prepare("SELECT * FROM media");
$sql->execute();
$data = '';
$data .= '<div class="tab-pane fade show active" id="" role="tabpanel">';
$data .= '<table id="question_data_table" class="table align-items-center mb-0">';
$data .= '<thead>';
$data .= '<tr class="bg-light">';
$data .= '<th class="text-uppercase text-dark text-xs font-weight-bolder" style="width: 5%">Mã media</th>';
$data .= '<th class="text-center text-uppercase text-dark text-xs font-weight-bolder" scope="col" style="width: 15%">Tên media</th>';
$data .= '<th class="text-center text-uppercase text-dark text-xs font-weight-bolder">Đường đẫn hoặc đoạn văn</th>';
$data .= '<th class="text-dark text-center" style="width: 15%">Thao tác</th>';
$data .= '</tr>';
$data .= '</thead>';
$data .= '<tbody id="media">';
while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
    $data .= '<tr id=' . $result['id_media'] . '>';
    $data .= '<td>';
    $data .= '<div class="d-flex px-4 py-1">';
    $data .= '<span>' . $result['id_media'] . '</span>';
    $data .= '</div>';
    $data .= '</td>';
    $data .= '<td>';
    $data .= '<div class="d-flex flex-column justify-content-center px-2 py-1">';
    $data .= '<h5 class="text-center">' . $result['name_media'] . '</h5>';
    $data .= '</div>';
    $data .= '</td>';
    $data .= '<td class="align-center text-center text-sm">';
    $data .= '<h6 class="mb-0 text-sm">' . $result['description_media'] . '</h6>';
    $data .= '</td>';
    $data .= '<td class="align-middle text-center">';
    $data .= '<input type="button" class="btn btn-warning text-dark mb-0" href="javascript:;" value="Sửa" name="update"></input>';
    $data .= '<input type="button" class="btn btn-danger text-white mb-0" href="javascript:;" value="Xoá" name="delete"></input>';
    $data .= '</td>';
    $data .= '</tr>';
}
$data .= '</tbody>';
$data .= '</table>';
$data .= '</div>';
echo $data;
