const Ziggy = {"url":"http:\/\/hackathon-cpgoias4.test","port":null,"defaults":{},"routes":{"home":{"uri":"\/","methods":["GET","HEAD"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"history_index":{"uri":"history","methods":["GET","HEAD"]},"irrigation_index":{"uri":"irrigation","methods":["GET","HEAD"]},"timeline_index":{"uri":"timeline","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"register_store":{"uri":"register","methods":["POST"]},"login":{"uri":"login","methods":["GET","HEAD"]},"login_store":{"uri":"login","methods":["POST"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
