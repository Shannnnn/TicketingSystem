<div class="ui small modal message-box">
  <div class="ui header message-title">
    {{ $title }}
  </div>
  <div class="content message-content">
    <p>{{ $slot }}</p>
  </div>
  <div class="actions message-actions">
    <div class="ui green ok button message-yes">
        <i class="checkmark icon"></i>
        OK
    </div> 
  </div>
</div>