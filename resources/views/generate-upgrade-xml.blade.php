<upgrade version="1" type="links">
<config/>
   <links>
       <link>
          <url>{{ config('myconfig.urlprefix') }}/{{ $version }}/routeros-{{ $version }}-{{ $shortarch }}.npk</url>
       </link>
       <link>
          <url>{{ config('myconfig.urlprefix') }}/{{ $version }}/tr069-client-{{ $version }}-{{ $shortarch }}.npk</url>
       </link>
@if(isset($extrapackage))
       <link>
          <url>{{ config('myconfig.urlprefix') }}/{{ $version }}/{{ $extrapackage }}-{{ $version }}-{{ $shortarch }}.npk</url>
       </link>
@endif
   </links>
</upgrade>

