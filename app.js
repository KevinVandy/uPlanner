self.addEventListener('load', async e => {
  if ('serviceWorker' in navigator) {
    try {
      navigator.serviceWorker.register('sw.js');
      //console.log('sw registered');
    } catch (error) {
      console.log('sw failed');
    }
  }
});