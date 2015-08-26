{if !empty({{sugarvar key='value' string=true}})}
    <object width="425" height="350">
    <param name="movie" value="http://www.youtube.com/v/{{sugarvar key='value'}}></param>
        <param name="wmode" value="transparent"></param>
    <embed src="http://www.youtube.com/v/{{sugarvar key='value'}}" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed>
    </object>{/if}