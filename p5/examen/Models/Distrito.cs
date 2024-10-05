using System;
using System.Collections.Generic;

namespace examen.Models;

public partial class Distrito
{
    public int IdDistrito { get; set; }

    public string? Nombre { get; set; }

    public virtual ICollection<Zona> Zonas { get; set; } = new List<Zona>();
}
