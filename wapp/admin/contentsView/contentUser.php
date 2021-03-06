<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/AdminMain.php";?>
<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/commons/metaData.php"; ?>
<?
    $obj = new AdminMain($_REQUEST);
    $list = $obj->getUserList();
//    echo json_encode($list);

    echo json_encode($_REQUEST);

?>
<script>
    $(document).ready(function(){
        $(".jPage").click(function(){
            $("[name=page]").val($(this).attr("page"));
            form.submit();
        });

        $(".jSearch").click(function(){
            $("[name=searchTxt]").val($("#searchTxt").val());
            $("[name=form]").submit();
        });

        $(".jDel").click(function(){
            var id = $(this).attr("no");
        });
    });
</script>

<style>
    .center{
        text-align:center;
    }
</style>

<div class="row-fluid">
    <form name="form">
        <input type="hidden" name="target" value="<?="/admin/" . $LEFT_MENU_INFO["userList.php"]["전체 회원"]?>"/>
        <input type="hidden" name="searchTxt"/>
        <input type="hidden" name="page"/>
    </form>

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">유저 리스트</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <div class="searchArea" align="center">
                    <input type="text" class="search-query" id="searchTxt" placeholder="휴대폰번호 검색" value="<?=$_REQUEST["searchTxt"]?>"> <button class="btn jSearch">검색</button>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                    <thead>
                    <tr>
                        <th>이름</th>
                        <th>ID</th>
                        <th>휴대폰번호</th>
                        <th>연령</th>
                        <th>타입</th>
                        <th>가입일시</th>
                        <th>-</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?foreach($list as $row){?>
                        <tr class="odd">
                            <td class="center"><?=$row["name"]?></td>
                            <td class="center"><?=$row["account"]?></td>
                            <td class="center"><?=$row["phone"]?></td>
                            <td class="center"><?=$row["age"] . " 대"?></td>
                            <td class="center">
                                <?
                                    switch($row["type"]){
                                        case "M":
                                            echo "인력";
                                            break;
                                        case "G":
                                            echo "장비";
                                            break;
                                        case "N":
                                            echo "일반";
                                            break;
                                    }
                                ?>
                            </td>
                            <td class="center"><?=$row["regDate"]?></td>
                            <td class="center"><button class="btn jDel" no="<?=$row["id"]?>">삭제</button></td>
                        </tr>
                    <?}?>
                    </tbody>
                </table>
                <?include $_SERVER["DOCUMENT_ROOT"] . "/admin/commons/pageNavigator.php";?>
            </div>
        </div>
    </div>
</div>