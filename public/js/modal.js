window.onload = function () {
  let message = getMessage();
  showMessage(message);
}

const getMessage = () => {
  let url = window.location.search;
  let params = new URLSearchParams(url);
  const message = {
    text: params.get('message'),
    icon: params.get('icon') || 'warning'
  }

  return message;
}

const showMessage = (message) => {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  Toast.fire({
    icon: message.icon,
    title: message.text
  })
}