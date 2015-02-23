<?php
$user_model = \User::find($user['id']);
?>

안녕하세요 {{ $user['name_kor'] }}님,

학습자님은 3월 15일 개강 예정인 xxx 교육과정의 입과 대상자로 등록되었습니다.

원활한 교육 입과 및 준비를 위하여 필히 사전 레벨테스트에 참가해 주시길 부탁드립니다.

사전 레벨테스트는 <a href="http://tmip.themandarin.co.kr">http://tmip.themandarin.co.kr</a> 에 로그인 후 진행해 주시기 바랍니다.

사전 레벨테스트의 기한은 ~일 까지이며 참가하지 않으실 경우 교육 입과가 불가능할 수도 있사오니,

이점 양지 부탁드립니다.

TMIP 사용중 문의사항이 있으실 경우 <a href="mailto:dev&#64;themandarin.co.kr"></a>dev&#64;themandarin.co.kr 로 문의 주시기 바랍니다.

{{ date('%Y-%m-%d') }}, 더만다린 주식회사.