function clipboard(url) {
  const el = document.createElement('textarea');
  el.value = url;
  document.body.appendChild(el); 
  el.select();
  document.execCommand('copy'); 
  document.body.removeChild(el); 
  alert("Texte copié dans le presse-papier");
}
