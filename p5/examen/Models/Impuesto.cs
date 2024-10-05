using System;
using System.Collections.Generic;

namespace examen.Models;

public partial class Impuesto
{
    public int IdImpuesto { get; set; }

    public string TipoImpuesto { get; set; } = null!;

    public virtual ICollection<Propiedad> Propiedads { get; set; } = new List<Propiedad>();
}
