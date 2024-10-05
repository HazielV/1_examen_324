using System;
using System.Collections.Generic;

namespace examen.Models;

public partial class Usuario
{
    public int Id { get; set; }

    public int? PersonaId { get; set; }

    public string? Password { get; set; }

    public string? Usuario1 { get; set; }

    public virtual Persona? Persona { get; set; }
}
